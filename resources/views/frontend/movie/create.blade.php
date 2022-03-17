@extends('layoutFrontend.master')
@section('title', 'Order')
@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
@endsection
@section('content')

    <div class="col-12" style="margin-bottom: 150px">
        <div class="row">
            <div style="margin-left: 30%" class="col-8">
                <form action="" method="post">
                    <h2 style="color: red">Order Ticket</h2>
                    <label>Chọn ngày:
                        <input type="date" name="date">
                    </label><br><br>
                    <label>Chọn ghế:
                        <select name="name" id="select">
                            <option value="#" disabled selected>--Available--</option>
                            @foreach($seats as $seat)
                                @if($seat->status == "null")
                                    <option class="seat" price="{{$seat->seattype->price}}"
                                            seatType="{{$seat->seatType->name}}"
                                            value="{{$seat->name}}">{{$seat->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </label><br><br>
                    <p>Giá: <span id="price-span"></span></p>
                    <p>Loại: <span id="seatType-span"></span></p>
                    <span>Đồ ăn:
                        <input id="yes" type="radio" name="f&d" value="yes">
                        <label for="yes">Yes</label>
                        <input id="no" type="radio" name="f&d" value="no">
                        <label for="no">No</label>
                    </span><br>

                    <div id="foods" class="col-9">
                        <h3>Food & Drink</h3>
                        <div class="row">
                            @foreach($foods as $food)
                                <div class="col-3">
                                    <div class="card">
                                        <img class="card-img-top" src="{{$food->image}}" alt="food">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$food->name}}</h5>
                                            <p class="card-text">Giá: {{$food->price}} vnd</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <br>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Order</button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Food&Drinks</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach($foods as $food)
                                        <ul>
                                            <li>{{$food->name}}</li>
                                        </ul>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-2"></div>
        </div>

    </div>


    <script>
        $(document).ready(function () {

            $("select").on('change', function () {
                //in ra gia
                var price = $('option:selected', this).attr('price');
                $("#price-span").html(price + ' vnd');
                //in ra loai ghe
                var seatType = $('option:selected', this).attr('seatType');
                $("#seatType-span").html(seatType);
            });

            $("#foods").hide();

            $("input[type='radio']").click(function () {
               var inputVal = $(this).attr('value');
               if (inputVal == "yes") {
                   $("#foods").show();
               } else {
                   $("#foods").hide();
               }
            });


            //
            // $("#yes").on('click', function () {
            //    $("#foods").show();
            // });
        });
    </script>
@endsection
