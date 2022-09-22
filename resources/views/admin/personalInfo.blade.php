<x-app-layout>
    <x-slot name="header">
        User Info
    </x-slot>
    <div class="container">
        <form action="" method="POST">
            @csrf
            <div class="row">
                {{-- PERSONAL INFO --}}
                <div class="col-md-4 self-center">
                    <label for="profileImage" class="w-100 cursor-pointer">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="User Image"
                            class="w-[70%] mx-auto rounded-circle border-gray-300 border">
                    </label>
                    <input type="file" class="d-none" name="profile_image" id="profileImage">
                </div>
                <div class="col-md-8 ">
                    <div class=" mb-3">
                        <label for="name">First name</label>
                        <input type="text" class="form-control rounded border-gray-300" id="name" name="name"
                            placeholder="Full Name" required="">

                    </div>
                    <div class=" mb-3">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control rounded border-gray-300" id="email" name="email"
                            placeholder="Email Address" required="">

                    </div>
                    <div class=" mb-3">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control rounded border-gray-300" id="phone" name="phone"
                            placeholder="Phone Number" required="">

                    </div>
                </div>
                {{-- PERSONAL INFO --}}
                {{-- PARENT INFO --}}
                <div class="col-md-4 mb-3">
                    <label for="fatherName">Father Name</label>
                    <input type="text" name="father_name" class="form-control rounded border-gray-300" id="fatherName"
                        placeholder="Father Name" required="">

                </div>
                <div class="col-md-4 mb-3">
                    <label for="motherName">Mother Name</label>
                    <input type="text" name="mother_name" class="form-control rounded border-gray-300" id="motherName"
                        placeholder="Mother Name" required="">

                </div>
                <div class="col-md-4 mb-3">
                    <label for="guardianNumber">Guardian Number</label>
                    <input name="guardian_number" type="text" class="form-control rounded border-gray-300"
                        id="guardianNumber" placeholder="Guardian Number" required="">

                </div>
                {{-- PARENT INFO --}}
                {{-- NID INFO --}}
                <h3 class="col-12 mt-5 text-3xl pb-2 border-b-2 mb-4">NID Info</h3>
                <div class="nidImages">
                    <div class="grid md:grid-cols-2 gap-3">
                        <img class="w-100" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Credit-card-front.svg/2560px-Credit-card-front.svg.png"
                            alt="">
                        <img class="w-100" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Credit-card-front.svg/2560px-Credit-card-front.svg.png"
                            alt="">
                    </div>
                </div>
                {{-- NID INFO --}}
            </div>
        </form>
    </div>
</x-app-layout>