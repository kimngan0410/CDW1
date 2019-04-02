@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
@parent
@endsection

@section('content')

<div class="container">
    <h2>Booking</h2>
    <div class="row">
        <div class="col-md-8">
            <form role="form" action="#">
                <section>
                    <h3>Contact Information</h3>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="control-label">
                                        First Name:
                                    </label>
                                    <input id="cus_fname" name="cus_fname" type="text" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">
                                        Last Name:
                                    </label>
                                    <input id="cus_lname" name="cus_lname" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="control-label">
                                        Contact's Mobile phone number
                                    </label>
                                    <input id="cus_phone" name="cus_phone" type="tel" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">
                                        Contact's email address
                                    </label>
                                    <input id="cus_email" name="cus_email" type="email" class="form-control">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-default">Clear all</button>
                                <button type="button" class="btn btn-default">Reset</button>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <h3>Passenger(s) Details</h3>
                    <?php
                    $i = 1;
                    while ($i <= $total) {
                        ?>

                        <div class="panel panel-default">
                        <div class="panel-body">
                            <h4>Passenger #<?php  echo($i);?></h4>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label class="control-label">Title:</label>
                                    <select class="form-control">
                                        <option id="mr<?php echo($i);?>" name="mr<?php echo($i);?>" value="mr">Mr.</option>
                                        <option id="mrs<?php echo($i);?>" name="mrs<?php echo($i);?>" value="mrs">Mrs.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="control-label">First Name:</label>
                                    <input id="fname<?php echo($i);?>" name="fname<?php echo($i);?>" type="text" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Last Name:</label>
                                    <input id="lname<?php echo($i);?>" name="lname<?php echo($i);?>" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                        <?php
                        $i = $i + 1;
                    }
                    ?>
                </section>
                <section>
                    <h3>Price Details</h3>
                    <div>
                        <h5>
                            <strong class="airline">Qatar Airways</strong>
                            <p><span class="flight-class">Economy</span></p>
                        </h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="pull-left">
                                    <strong>Passengers Fare (x3)</strong>
                                </div>
                                <div class="pull-right">
                                    <strong>IDR24.796.650,00</strong>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="pull-left">
                                    <span>Tax</span>
                                </div>
                                <div class="pull-right">
                                    <span>Included</span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item list-group-item-info">
                                <div class="pull-left">
                                    <strong>You Pay</strong>
                                </div>
                                <div class="pull-right">
                                    <strong>IDR24.796.650,00</strong>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                    </div>
                </section>
                <section>
                    <h3>Payment</h3>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label">
                                    Payment Method:
                                </label>
                                <select class="form-control">
                                    <option value="transfer">Transfer</option>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="paypal">Paypal</option>
                                </select>
                            </div>
                            <h4>Credit Card</h4>
                            <div class="form-group">
                                <label class="control-label">Card Number</label>
                                <input type="number" class="form-control" placeholder="Digit card number">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <label class="control-label">Name on card:</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <label class="control-label">CCV Code:</label>
                                    <input type="number" maxlength="3" class="form-control" placeholder="Digit CCV">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            Continue to Booking
                        </button>
                    </div>
                </section>
            </form>
        </div>
        <div class="col-md-4">
            <h3>Flights</h3>
            <aside>
                <article>
                    <div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5>
                                    <strong class="airline">Qatar Airways QR-957</strong>
                                    <p><span class="flight-class">Economy</span></p>
                                </h5>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div><big class="time">18:45</big></div>
                                                <div><small class="date">29 Apr 2017</small></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div><span class="place">Jakarta (CGK)</span></div>
                                                <div><small class="airport">Soekarno Hatta Intl Airport</small></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <i class="glyphicon glyphicon-arrow-down"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div><big class="time">23:20</big></div>
                                                <div><small class="date">29 Apr 2017</small></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div><span class="place">Doha (DOH)</span></div>
                                                <div><small class="airport">Doha Hamad International Airport</small></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-warning">
                                <ul>
                                    <li>Transit for 1h 30m in Doha (DOH)</li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <h5>
                                    <strong class="airline">Qatar Airways QR-1052</strong>
                                    <p><span class="flight-class">Economy</span></p>
                                </h5>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div><big class="time">00:50</big></div>
                                                <div><small class="date">30 Apr 2017</small></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div><span class="place">Doha (DOH)</span></div>
                                                <div><small class="airport">Doha Hamad International Airport</small></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <i class="glyphicon glyphicon-arrow-down"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div><big class="time">02:55</big></div>
                                                <div><small class="date">30 Apr 2017</small></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div><span class="place">Abu Dhabi (AUH)</span></div>
                                                <div><small class="airport">Abu Dhabi Intl</small></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </article>
            </aside>
        </div>
    </div>
</div>
<br>
@endsection