<div class="col-md-2 col-sm-4 sidebar1">
        <div class="left-navigation">
            <ul class="list">
                <li> <a href="{{ url('/users') }}"> Admins <a></li>
                <li> <a href="{{ url('/') }}"> Dashboard <a></li>
                <li> <a href="{{ url('/mpesa/payments') }}"> Mpesa Payments <a></li>
                <li> <a href="{{ url('/dashboard/sms-groups') }}"> Sms Groups <a></li>
                <li>
                    <a class="ulbox" data-toggle="collapse" data-target="#glub">
                    Corporate Subscriptions <span class="caratBx"><i class="fas fa-caret-down"></i></span></a>
                    <ul id="glub" class="collapse caret">
                        <li> <a href="{{ url('/corporate_subscriptions') }}"> Plans <a> </li>
                         <li> <a href="{{ url('/corporate_subscription/meals') }}"> Meals <a> </li>
                        <li> <a href="{{ url('/corporate_subscription/groups') }}"> Groups <a> </li>
                        <li><a href="{{ url('/corporate_subscription/subscribers') }}"> Subscribers  </a> </li>
                        <li><a href="{{ url('/corporate_subscription/grubsubsorders') }}"> Orders </a> </li>
                        <li><a href="{{ url('/corporate_subscription/payments') }}"> Payments </a> </li>
                    </ul>
                </li>
                <li><a href="{{ url('/delivery_services') }}"> Services</a></li>
                <li><a href="{{ url('/customers') }}"> Customers</a> </li>
                <li>
                    <a  data-toggle="collapse" data-target="#demo">Store <span class="caratBx"> <i class="fas fa-caret-down"></i></span> </a>
                    <ul id="demo" class="collapse">
                        <li> <a href="{{ url('/store') }}"> All Stores <a> </li>
                        <li> <a href="{{ url('/itemcategories') }}"> Item Category  </li>
                        <li><a href="{{ url('/itemtype') }}"> Items Type </a> </li>
                        <li><a href="{{ url('/items') }}"> Items </a> </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a  data-toggle="collapse" data-target="#drivers">
                    Drivers
                    <span class="caratBx"><i class="fas fa-caret-down"></i></span></a>
                    <ul id="drivers" class="collapse">
                        <li> <a href="{{ url('/drivers') }}">All Drivers<a></li>
                        <li><a href="{{ url('/vehicles') }}"> Vehicles </a> </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a  data-toggle="collapse" data-target="#orders">
                    Orders <span class="caratBx"><i class="fas fa-caret-down"></i></span></a>
                    <ul id="orders" class="collapse">
                        <li> <a href="{{ url('/orders') }}">All Orders <a></li>
                        <li><a href="{{ url('#') }}"> Processing </a> </li>
                        <li><a href="{{ url('#') }}"> Cancelled </a> </li>
                    </ul>
                </li>
                <li>
                    <a  data-toggle="collapse" data-target="#settings">
                    Settings <span class="caratBx"><i class="fas fa-caret-down"></i></span></a>
                    <span class="caret"></span></button>
                    <ul id="settings" class="collapse">
                        <li> <a href="{{ url('/loyalty_rewords')}}"> Loyalty Points <span class="caret"></span><a> </li>

                    </ul>
                </li>
            </ul>
        </div>



</div>
