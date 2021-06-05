# Assessment for Backend Developer. 
* Author  : Bayu Indrawan

## App Setup
1. Clone this than `composer install`
2. Open `.env` copy all value from `.env.example`
3. Create database mysql `aoneschool` 
4. Run `php artisan migrate`
5. Run `php artisan db:seed` this will create `10000 data student`, `10000 data lesson`, and `100000 data student_lesson`. This command will take a few minutes.

## Laravel Console Command to Populate Invoices and Invoice Details 
```php artisan command:createInvoice```

## Scenario
* Table 1: `lessons`
- model name: `Lesson`
- many-to-many relationship to `students` via `lesson_student` table

* Table 2: `students`
- model name: `Student`
- many-to-many relationship to `lessons` via `lesson_student` table

* Table 3: lesson_student
- `student_id` is a foreign key to `students.id`
- `lesson_id` is a foreign key to `lessons.id`

* Table 4: `invoices`
- model name: `Invoice`
- has-many relations to `invoice_details` using method name `details`

## Challenge :
1. With all tables structure above, what you need to do:
- create an empty Laravel application from scratch
- create database migration to create those tables
- write Eloquent models for all the tables
- create factory and seeders to seed student, lesson and lesson_student data.
2. Write a Laravel console command to populate invoices and invoice_details tables with data match following criteria:
- students which students.invoice_day is calendar day today (e.g.; if today date is 2021-05-31, the invoice_day should only take value of 31)
- only students.is_active == 1
- only lessons.is_enabled == 1
- invoices.total_amount is accumulated total of all lesson's fee for the student
- invoices.invoice_date is current timestamp