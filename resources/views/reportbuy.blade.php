@extends('mainadmin')

@section('section')


  <script src="js/reportbuy.js"></script>

    <link rel="stylesheet"
        href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>






{{ csrf_field() }}

      <section id="main-content">
          <section class="wrapper">
      		<div class="row mt">
      			<div class="col-lg-12 col-md-12 col-sm-12">
              <! -- STRIPPED PROGRESS BARS -->
              <div class="showback">
                <h4><i class="fa fa-angle-right"></i> รายงานการซื้อ</h4>


<input id="month" type="month" class="form-control">




              <table id="tablepayment" class="table table-bordered" style="border-color:#000; text-align:center;">
                  <caption>รายงานการซื้อ</caption>
                  <thead>
                    <tr id="headtable">
                      <th scope="col"style="border-color:#000; text-align:center;">วิชา</th>
                      <th scope="col" style="border-color:#000; text-align:center;">กลุ่ม</th>
                      <th scope="col" style="border-color:#000; text-align:center;">จำนวนรวม</th>

                    </tr>
                  </thead>
                  <tbody id="report">

                  </tbody>
                </table>


      </section><!-- /MAIN CONTENT -->

</section>





    @endsection
