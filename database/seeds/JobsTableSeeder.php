<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jobs')->insert([
            ['user_id'=> 1,
             'category_id'=> 1,
             'type_id'=> 1,
             'location_id'=>1,
             'title'=> 'Javascript Fullstack Developer',
             'company_name'=> 'Test Company Name Now',
             'describe'=> 'Test Describtion Now',
             'city'=> 'Alex',
             'salary'=> 8000,
             'number_days'=> 50,
             'more_info'=> 'Test More Information Now',
             'image_video'=> 'Test Link Video Or Image Now'

        ],
        ['user_id'=> 1,
        'category_id'=> 2,
        'type_id'=> 2,
        'location_id'=>1,
        'title'=> 'Javascript Fullstack Developer job2',
        'company_name'=> 'Test Company Name Now job 2',
        'describe'=> 'Test Describtion Now job2',
        'city'=> 'Alex job2',
        'salary'=> 8000,
        'number_days'=> 50,
        'more_info'=> 'Test More Information Now',
        'image_video'=> 'Test Link Video Or Image Now'
        ],
        ['user_id'=> 1,
        'category_id'=> 3,
        'type_id'=> 1,
        'location_id'=>1,
        'title'=> 'Lead FP&A Operations Analyst',
        'company_name'=> 'General Electric',
        'describe'=> 'Support CFOs in all finance related matters for Steam Power in Egypt & Levant including project management, financial reporting, stat & tax matters, and balance sheet analysis
        Be accountable for all Steam financial structure in a given Company Code
        Partner with Sales and Operations teams to ensure Steam meets its financial targets
        Establish and maintain appropriate financial routines and controls to ensure appropriate reporting and measurement
        Support quarterly financial closing and reporting activities
        Lead and participate in quarter close activities (prepare and post accruals) and reporting activities (DRs)
        Lead quarterly project reviews and margin reviews as required
        Improve project cost estimation, timely invoicing
        Support region in driving billing and collection
        Reconcile / review account reconciliation as needed
        Work with Region CFO and finance to analyze balance sheet for opportunities on P&L and CFOA
        Analyze aged WIP. ECA, GRNI and drive project closures
        Support on planning cycles and BP reviews. Coordinate with relevant resources in Finance, Operations, Sales and other applicable functions
        Support CAS / STAT / Tax audits
        Support Steam projects related to LE registration and closure/ERP implementation',
        'city'=> 'Cairo',
        'salary'=> 8000,
        'number_days'=> 30,
        'more_info'=> 'Responsible for all financial activity of Steam Power in Egypt & Levant.
        The role requires a strong accounting expertise, financial acumen and proven experience in financial accounting, closing and reporting. Support the country operations and finance leaders with all Steam volume, and work with support functions on all statuary, tax, and Intercompany related matters.',
        'image_video'=> 'Test Link Video Or Image Now'

        ],
        ['user_id'=> 1,
        'category_id'=> 4,
        'type_id'=> 2,
        'location_id'=>1,
        'title'=> 'STEAM Instructor/Teacher',
        'company_name'=> 'Technokids & TechnoFuture Elseyouf',
        'describe'=> ' Demonstrate the ability to model, deliver, and craft rich student-centered learning experiences around Science, Technology, Engineering, Arts, and Math.
        - Demonstrate the ability to create and implement strategies for weaving STEAM experiences into multi-disciplinary curricula from grades 5 through 8.
        - Work in partnership with teachers and staff, modeling consistent effective teaching with technology, engagement, lesson plan design, use of technology, STEAM and online tools.
        - Demonstrate fundamental knowledge of the connection between technology, computer science, and other fields of study.
        - Understand and be able to design, develop, assess, and manage STEAM learning experiences.',
        'city'=> 'Siouf, Alexandria',
        'salary'=> 8000,
        'number_days'=> 30,
        'more_info'=> 'Bachelor of computer science - Faculty of Science/Engineering.

        - Fluent in English.
        
        - Fluent in using Microsoft Office applications.
        
        - Be able to travel to competitions whether inside or outside Egypt.
        
        - Can work on rotatable shifts when needed.',
        'image_video'=> 'Test Link Video Or Image Now'

        ]
        ]);
    }
}
