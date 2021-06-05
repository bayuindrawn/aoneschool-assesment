<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Student;
use Illuminate\Console\Command;

class CreateInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createInvoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for create student invoices';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = date('d');
        $now = date('Y-m-d H:i:s');

        $queryInvoice = Student::with('lesson')
            ->has('lesson')
            ->where('invoice_day', $today)
            ->where('is_active', 1);
        $getInvoice = $queryInvoice->get();

        if(!empty($getInvoice)){
            foreach ($getInvoice as $student) {
                $totalAmount = 0;
                // create invoice student
                $storeInvoice = Invoice::create([
                    'student_id' => $student['id'],
                    'total_amount' => $totalAmount,
                    'invoice_date' => $now
                ]);
                $data = [];
                foreach ($student['lesson'] as $lesson) {
                    $totalAmount += $lesson['lesson_fee'];
                    $data[] = [
                        'invoice_id' => $storeInvoice->id,
                        'lesson_id' => $lesson['id'],
                        'lesson_fee' => $lesson['lesson_fee']
                    ];
                    
                }
                // create invoice detail student
                InvoiceDetail::insert($data);
                // $updateAmount = Invoice::find($storeInvoice->id);
                $storeInvoice->total_amount = $totalAmount;
                $storeInvoice->save();

            }
        }
        echo "Invoice Created" . PHP_EOL;
        return 1;
    }
}
