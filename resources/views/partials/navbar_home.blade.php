<div class="sidebar" data-color="blue">
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a class="btn btn-warning btn-simple credit-balance my-0 mr-3"><h2 class="m-0 text-warning"><strong>฿{{ Auth::user()->money }}</strong></h2></a>
            </li>
            <li>
                <a href="/transfer">
                    <i class="now-ui-icons business_money-coins"></i>
                    <p>เติมเงิน / ถอนเงิน</p>
                </a>
            </li>
            @if(Auth::user()->is_admin)
            <li>
                                    <a href="{{ url('setting') }}">
                                    <i class="now-ui-icons ui-1_settings-gear-63"></i>
                                    <p>ตั้งค่าระบบ</p>
                                    </a>
            </li>
             @endif
            <li>
                <a href="/manual">
                    <i class="now-ui-icons education_agenda-bookmark"></i>
                    <p>คู่มือการเล่น</p>
                </a>
            </li>
        </ul>
    </div>
</div>
