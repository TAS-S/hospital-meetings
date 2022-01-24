<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

        <!-- partial:partials/_navbar.html -->

        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper">



            <div class="container mx-auto" style="margin-top: 100px">

                @if (session()->has('message'))


                <div class="flex justify-between text-blue-200 shadow-inner rounded p-3">
                    <p class="self-center"><strong>Info </strong>{{ session()->get('message') }}</p>
                    <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
                </div>

            {{-- <div class="alert alert-success">
                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">{{ session()->get('message') }}</p>
                    <button class="close" data-dismiss="alert">
                        X
                    </button>
                </div>

            </div> --}}

            @endif

                <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">



                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md text-black">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">Doctor Name</label>
                                    <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Phone number</label>
                                    <input type="text" name="phone" id="phone" autocomplete="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                    <input type="email" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="speciality" class="block text-sm font-medium text-gray-700" required>Specialization</label>
                                    <select id="speciality" name="speciality" autocomplete="speciality" class="mt-1 block w-full py-2 px-3 border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>-- Select -- </option>
                                    <option>General</option>
                                    <option>Cardiologist</option>
                                    <option>Surgeon</option>
                                    <option>Laryngologist</option>
                                    <option>Oculist</option>
                                    <option>Dermatologist</option>

                                    </select>
                                </div>

                                <div class="col-span-6">
                                    <label for="room" class="block text-sm font-medium text-gray-700">Room No</label>
                                    <input type="text" name="room" id="room" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-6">

                                    <label for="file" class="block text-sm font-medium text-gray-700">Doctor image</label>
                                    <label for="file" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">

                                        <input id="file" name="file" type="file" class="sr-only">
                                    </label>

                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>


                                <div class="px-4 py-3 text-left sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <!-- plugins:js -->
        @include('admin.script')
    </div>
  </body>
</html>
