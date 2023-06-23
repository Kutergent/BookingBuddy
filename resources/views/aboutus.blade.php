<x-guest-layout>

        <div
            class="relative pt-16 pb-32 flex content-center items-center justify-center"
            style="min-height: 75vh;"
        >
            <div
            class="absolute top-0 w-full h-full bg-center bg-cover bg-gray-950"
            >
            <span
                id="blackOverlay"
                class="w-full h-full absolute opacity-75 bg-black"
            ></span>
            </div>
            <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                <div class="pr-12">
                    <h1 class="text-white font-semibold text-5xl">
                    Your story starts with us
                    </h1>
                    <p class="mt-8 text-md text-gray-300 text-center">
                    <b class="text-lg">BookingBuddy</b> is a web-based reservation application designed to help businesses manage reservations and bookings efficiently. With BookingBuddy, customers can easily search for available reservations and make bookings online, while businesses can manage bookings, set custom rules and restrictions, and track performance using the platform's analytics and reporting tools.
                    </p>
                </div>
                </div>
            </div>
            </div>
            <div
            class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
            style="height: 70px;"
            >
            <svg
                class="absolute bottom-0 overflow-hidden"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none"
                version="1.1"
                viewBox="0 0 2560 100"
                x="0"
                y="0"
            >
                <polygon
                class="text-gray-300 fill-current"
                points="2560 0 2560 100 0 100"
                ></polygon>
            </svg>
            </div>
        </div>
        <section class="pb-20 bg-gray-300 -mt-24">
            <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                    style="box-shadow: rgba(0, 0, 0, 0.35) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;"
                >
                    <div class="px-4 py-5 flex-auto">
                    <div
                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-gray-800"
                    >
                        <i class="fas fa-award"></i>
                    </div>
                    <h6 class="text-xl font-semibold">Seamless Reservation Management</h6>
                    <p class="mt-2 mb-4 text-gray-600">
                        Managing your reservations has never been easier. Our intuitive interface allows you to effortlessly book and manage your reservations all in one place.
                    </p>
                    </div>
                </div>
                </div>
                <div class="w-full md:w-4/12 px-4 text-center">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                    style="box-shadow: rgba(0, 0, 0, 0.35) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;"
                >
                    <div class="px-4 py-5 flex-auto">
                    <div
                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-gray-600"
                    >
                        <i class="fas fa-retweet"></i>
                    </div>
                    <h6 class="text-xl font-semibold">Customizable Fields and Booking Options</h6>
                    <p class="mt-2 mb-4 text-gray-600">
                        Flexible administration features, administrators have full control over the reservation system.
                    </p>
                    </div>
                </div>
                </div>
                <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                    style="box-shadow: rgba(0, 0, 0, 0.35) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;"
                >
                    <div class="px-4 py-5 flex-auto">
                    <div
                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-gray-400"
                    >
                        <i class="fas fa-fingerprint"></i>
                    </div>
                    <h6 class="text-xl font-semibold">User Management and Administration</h6>
                    <p class="mt-2 mb-4 text-gray-600">
                        Provides robust user management capabilities, allowing administrators to oversee user accounts, permissions, and access levels.
                    </p>
                    </div>
                </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center mt-32">
                <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                <h3 class="text-3xl mb-2 font-semibold leading-normal">
                    BookingBuddy Provides   
                </h3>
                <ul  class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700">
                    <li>-User registration and authentication</li>
                    <li>-Real-time availability updates</li>
                    <li>-Customizable booking rules and restrictions</li>
                    <li>-Reporting and analytics to track usage and performance</li>
                    <li>-Integration with calendar apps</li>
                </ul>

                <a
                    href="{{ route('reserve') }}"
                    class="font-bold text-gray-800 mt-8"
                    >What are you waiting for? Book Now!</a
                >
                
                </div>
                <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                <div
                    class="relative flex flex-col min-w-0 break-word w-full mb-6 shadow-lg rounded-lg bg-gray-950"
                    style="box-shadow: rgba(0, 0, 0, 0.65) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;"
                >
                    <img
                    alt="..."
                    src="https://images.unsplash.com/photo-1649635838761-6d9397403ec0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                    class="w-full align-middle rounded-t-lg"
                    />
                    <blockquote class="relative p-8 mb-4">
                    <svg
                        preserveAspectRatio="none"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 583 95"
                        class="absolute left-0 w-full block"
                        style="height: 95px; top: -94px;"
                    >
                        <polygon
                        points="-30,95 583,95 583,65"
                        class="text-gray-950 fill-current"
                        ></polygon>
                    </svg>
                    <h4 class="text-xl font-bold text-white">
                        Top Notch Reservation App
                    </h4>
                    <p class="text-md font-light mt-2 text-white">
                        User-friendly reservation app that simplifies the process of booking and managing various services and accommodations. Whether it's flights, hotels, car rentals, or activities, BookingBuddy offers a seamless experience for customers, allowing them to effortlessly browse, select, and confirm their reservations.
                    </p>
                    </blockquote>
                </div>
                </div>
            </div>
            </div>
        </section>
        
        <section class="pb-1 relative block bg-gray-950">
            <div
            class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px;"
            >
            <svg
                class="absolute bottom-0 overflow-hidden"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none"
                version="1.1"
                viewBox="0 0 2560 100"
                x="0"
                y="0"
            >
                <polygon
                class="text-gray-950 fill-current"
                points="2560 0 2560 100 0 100"
                ></polygon>
            </svg>
            </div>
            <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">
            <div class="flex flex-wrap text-center justify-center">
                <div class="w-full lg:w-6/12 px-4">
                <h2 class="text-4xl font-semibold text-white">Support</h2>
                <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-400">
                    If you have any questions or issues with BookingBuddy, please contact our support team at 
                    <b class="text-white">support@bookingbuddy.com</b>
                </p>
                </div>
            </div>
            <div class="flex flex-wrap mt-12 justify-center">
                <div class="w-full lg:w-3/12 px-4 text-center">
                <div
                    class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-gray-300 inline-flex items-center justify-center"
                >
                    <i class="fas fa-medal text-xl"></i>
                </div>
                <h6 class="text-xl mt-5 font-semibold text-white">
                    Excelent services
                </h6>
                <p class="mt-2 mb-4 text-gray-400">
                    Experience unparalleled excellence with BookingBuddy's exceptional services, tailored to exceed your every expectation in the realm of reservation systems.
                </p>
                </div>
                <div class="w-full lg:w-3/12 px-4 text-center">
                <div
                    class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-gray-500 inline-flex items-center justify-center"
                >
                    <i class="fas fa-poll text-xl"></i>
                </div>
                <h5 class="text-xl mt-5 font-semibold text-white">
                    Grow your passion
                </h5>
                <p class="mt-2 mb-4 text-gray-400">
                    Ignite your passion and watch it flourish as BookingBuddy provides the perfect environment to nurture your creative spirit and elevate your management to new heights.
                </p>
                </div>
                <div class="w-full lg:w-3/12 px-4 text-center">
                <div
                    class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-gray-700 inline-flex items-center justify-center"
                >
                    <i class="fas fa-lightbulb text-xl"></i>
                </div>
                <h5 class="text-xl mt-5 font-semibold text-white">Unveil your skills</h5>
                <p class="mt-2 mb-4 text-gray-400">
                    Unleash your hidden talents and witness them unfold under the guidance of BookingBuddy's expert team, unlocking a world of possibilities for your unique skills to shine.
                </p>
                </div>
            </div>
            </div>
        </section>


        </main>
        <footer class="relative bg-gray-300 pt-8 pb-6\">
        <div
            class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px;"
        >
            <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
            >
            <polygon
                class="text-gray-300 fill-current"
                points="2560 0 2560 100 0 100"
            ></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4">
                <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
                <h5 class="text-lg mt-0 mb-2 text-gray-700">
                Find us on any of these platforms, we respond 1-2 business days.
                </h5>
                <div class="mt-6">
                <button
                    class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                    type="button"
                >
                    <i class="flex fab fa-twitter"></i></button
                ><button
                    class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                    type="button"
                >
                    <i class="flex fab fa-facebook-square"></i></button
                ><button
                    class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                    type="button"
                >
                    <i class="flex fab fa-dribbble"></i></button
                ><button
                    class="bg-white text-gray-900 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                    type="button"
                >
                    <i class="flex fab fa-github"></i>
                </button>
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="flex flex-wrap items-top mb-6">
                <div class="w-full lg:w-4/12 px-4 ml-auto">
                    <span
                    class="block uppercase text-gray-600 text-sm font-semibold mb-2"
                    >Useful Links</span
                    >
                    <ul class="list-unstyled">
                    <li>
                        <a
                        class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                        href="{{ route('welcome') }}"
                        >Home</a
                        >
                    </li>
                    <li>
                        <a
                        class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                        href="{{ route('reserve') }}"
                        >Book Now</a
                        >
                    </li>
                    </ul>
                </div>
                
                </div>
            </div>
            </div>
            <hr class="my-6 border-gray-400" />
            <div
            class="flex flex-wrap items-center md:justify-between justify-center"
            >
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-gray-600 font-semibold py-1">
                Copyright © 2023 by
                <a
                    href="https://www.creative-tim.com"
                    class="text-gray-600 hover:text-gray-900"
                    >BookingBuddy</a
                >.
                </div>
            </div>
            </div>
        </div>
        </footer>

</x-guest-layout>


