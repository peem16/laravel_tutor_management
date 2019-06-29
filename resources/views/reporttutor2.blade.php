@extends('mainadmin')

@section('section')

  <script src="js/reporttutor2.js"></script>


    <link rel="stylesheet"
        href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>






{{ csrf_field() }}

      <section id="main-content">
          <section class="wrapper">
      		<div class="row mt">
      			<div class="col-lg-10 col-md-12 col-md-12">


                <h4><i class="fa fa-angle-right"></i> รายงานการประเมินนักเรียน</h4>

              <div id="report">

              </div>


      </section><!-- /MAIN CONTENT -->

</section>





    @endsection
