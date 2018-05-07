<div class="sidebar" data-color="blue">
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a class="btn btn-warning btn-simple credit-balance my-0 mr-3"><h2 class="m-0 text-warning"><strong>฿{{ number_format(Auth::user()->money) }}</strong></h2></a>
            </li>
            <li>
                <a href="{{ url('/lotto') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>หวยออนไลน์</p>
                </a>
            </li>
            <li>
                <a href="{{ url('lotto/create') }}">
                    <i class="now-ui-icons education_atom"></i>
                    <p>ซื้อหวย</p>
                </a>
            </li>
            <li>
                <a href="{{ url('lotto-check') }}">
                <i class="now-ui-icons sport_trophy"></i>
                    <p>ผลรางวัล</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/transfer') }}">
                    <i class="now-ui-icons business_money-coins"></i>
                    <p>เติมเงิน / ถอนเงิน</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/manual') }}">
                    <i class="now-ui-icons education_agenda-bookmark"></i>
                    <p>คู่มือการเล่น</p>
                </a>
            </li>
        </ul>
    </div>
</div>
