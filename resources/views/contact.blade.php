@extends('layouts.app')

@section('content')
<main class="flex-1 p-6 bg-white md:ml-10 transition-all duration-300 rounded-tl-xl shadow-inner">
    <!--Contact information section-->
    <div>
    <section class="mb-8"> 
        <h3 class="text-gray-800 text-2xl font-bold mb-4">Contact information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!--Support email & phone number-->
            <div class="bg-blue-50 p-4 rounded-lg shadow-md">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-200 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-Gray-800 font-semibold"><u>Email</u></h4>
                        <a href="mailto:support@crm.com" class="hover:text-blue-800">support@crm.com</a>
                    </div>
                </div>
                <!--create space between email and phone number-->
                <div class="p-2"></div>

                <div class="flex items-center space-x-4">
                 <div class="bg-blue-200 p-3 rounded-full">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                 </div>
                 <div>
                    <h4 class="text-gray-800 font-semibold"><u>Phone Number</u></h4>
                    <p class="text-gray-700 font-medium">+254 778 764 563</p>
                    <p class="text-gray-700 font-medium">+254 795 674 900</p>

                 </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!--FAQ sections-->
    <section class="mb-8">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Frequently asked Questions</h3>
        <div class="space-y-4">
            <!-- FAQ Item -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-lg font-semibold">How do I add a customer?</h3>
            <p class="text-gray-600 mt-2">Go to the Customers page and click the "Add Customer" button. Fill in the required details and save.</p>
        </div>
        <!-- FAQ Item -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-lg font-semibold">How do I track tasks?</h3>
            <p class="text-gray-600 mt-2">Navigate to the Task Tracking page to view and manage all your tasks.</p>
        </div>
        </div>
    </section>
    <!--Feedback form-->
    <section class="mb-4 ">
        <h3 class="text-gray-800 text-bold text-2xl mb-4">Feedback Form</h3>
        <form action="" method="POST" class="space-y-4">
            <!--name-->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" name="name" id="name" maxlength="40" placeholder="Name" class="w-[300px] p-2 border border-gray-400 rounded-md" required/>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="Email" id="Email" placeholder="Email" class=" block w-[400px] p-2 border border-gray-400 rounded-md">
            </div>
            <!--feedback text area-->
            <div>
                <label for="feedback" class="block text-sm font-medium">Feedback</label>
                <textarea name="feedback" id="feedback" placeholder="Type your Feedback here" class="w-[400px] h-[200px] p-2 border border-gray-400 rounded-md" required></textarea>
            </div>
            <div>
                <button type="submit" class="bg-gray-600 text-white p-2 rounded-md">Submit</button>
            </div>
    </section>
</div>
 </main>
@endsection