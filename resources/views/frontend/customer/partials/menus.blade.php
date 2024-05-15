<div class="order-his-page">
    <ul class="profile-ul">
        <li class="profile-li"><a href="{{ route('customer.orders') }}" class="{{ request()->url() === route('customer.orders') ? 'active' : '' }}"><span>Orders</span> <span class="pro-count">{{ Auth::guard('customer')->user()->Orders->where('status', '>', 0)->count() }}</span></a></li>
        <li class="profile-li"><a href="{{ route('customer.profile') }}" class="{{ request()->url() === route('customer.profile') ? 'active' : '' }}">Profile</a></li>
        <li class="profile-li"><a href="{{ route('customer.address') }}" class="{{ request()->url() === route('customer.address') ? 'active' : '' }}">Address</a></li>
        <li class="profile-li"><a href="{{ route('customer.log.out') }}" >Log Out</a></li>
    </ul>
</div>
