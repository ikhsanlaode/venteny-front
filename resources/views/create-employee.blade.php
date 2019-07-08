<@extends('layout.app')
@section('content') 
<div class="content">
    <div class="card">
        <div class="header">
            <h4 class="title">Tambah karyawan</h4>
        </div>
        <div class="content">
            <form action="{{route('employee.store')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="email" name="email" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" class="form-control" placeholder="password" name="password" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-info btn-fill pull-right">Simpan</button>
                <div class="clearfix"></div>
            </form>
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