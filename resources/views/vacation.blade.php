@extends('layout.app')
@section('content')        

    <div class="content">
            <div class ="container-fluid">
                <a class="btn btn-primary" role="button" href="{{route('vacation.max.create')}}">Set Maximum Cuti</a>
                <a class="btn btn-primary" role="button" href="{{route('vacation.create')}}">Pengajuan Cuti</a>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Mulai</th>
                            <th>Berakhir</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        @php
                            $no = 1;
                        @endphp
                        <tbody>
                           @foreach ($data->data as $d)
                                <tr>
                                    @php
                                    @endphp
                                    <td>{{$no++}}</td>
                                    <td>{{$d->user->name}}</td>
                                    <td>{{$d->start_at}}</td>
                                    <td>{{$d->end_at}}</td>
                                    <td>{{$d->total." hari"}}</td>
                                    <td>{{$d->status->string}}</td>
                                    @if ($d->status->number > 0)
                                        <td>No Action</td>
                                    @else
                                        <td><a href="/vacation/approve/{{ $d->id }}">Approve</a> || <a href="/vacation/reject/{{ $d->id }}">Reject</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script type="text/javascript" src="{{ asset('/js/jquery.3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>

	<!--  Charts Plugin -->
    <script type="text/javascript" src="{{ asset('/js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap-notify.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script type="text/javascript" src="{{ asset('/js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
@endsection
