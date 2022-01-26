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

            <div class="container-fluid mx-auto bg-light" style="margin-top: 100px">
                <div class="row">

                    <table class="table" style="margin-top: 20px">
                        <thead class="table-dark">
                          <tr>
                            <th scope="col" class="text-white">#</th>
                            <th scope="col" class="text-white">Doctor name</th>
                            <th scope="col" class="text-white">Phone</th>
                            <th scope="col" class="text-white">Email</th>
                            <th scope="col" class="text-white">Speciality</th>
                            <th scope="col" class="text-white">Room no</th>
                            <th scope="col" class="text-white">Image</th>
                            <th scope="col" class="text-white">Action</th>
                          </tr>
                        </thead>

                        <tbody>

                            @foreach ($data as $datas)


                            <tr>
                                <th scope="row"></th>
                                <td>{{ $datas->name }}</td>
                                <td>{{ $datas->phone }}</td>
                                <td>{{ $datas->email }}</td>
                                <td>{{ $datas->speciality }}</td>
                                <td>{{ $datas->room }}</td>
                                <td><img src="doctor_image/{{ $datas->image }}"></td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('update_doctor', $datas->id) }}">Update</a>
                                    <a class="btn btn-danger" onclick="return('Are you sure to delete this position')" href="{{ url('delete_doctor', $datas->id) }}">Delete</a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                  </table>
                </div>
            </div>
        </div>

    <!-- plugins:js -->
        @include('admin.script')
    </div>
  </body>
</html>

