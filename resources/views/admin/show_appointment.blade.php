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

                        <table class="table">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col" class="text-white">#</th>
                                <th scope="col" class="text-white">Customer name</th>
                                <th scope="col" class="text-white">Email</th>
                                <th scope="col" class="text-white">Phone</th>
                                <th scope="col" class="text-white">Doctor Name</th>
                                <th scope="col" class="text-white">Date</th>
                                <th scope="col" class="text-white">Message</th>
                                <th scope="col" class="text-white">Status</th>
                                <th scope="col" class="text-white">Action</th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $datas)


                                <tr>
                                    <th scope="row"></th>
                                    <td>{{ $datas->name }}</td>
                                    <td>{{ $datas->email }}</td>
                                    <td>{{ $datas->phone }}</td>
                                    <td>{{ $datas->doctor }}</td>
                                    <td>{{ $datas->date }}</td>
                                    <td>{{ $datas->message }}</td>
                                    <td>{{ $datas->status }}</td>
                                    <td>
                                        <a class="btn btn-danger" href="{{ url('cancelled', $datas->id) }}">Cancelled</a>
                                        <a class="btn btn-success" href="{{ url('approved', $datas->id) }}">Approved</a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                          </table>
                          <table>

                      </div>
                  </div>
            </div>



    <!-- plugins:js -->
        @include('admin.script')
    </div>
  </body>
</html>
