<div class="navbar">
    <div class="logo">
        <img src="{{URL::asset('/storage')}}/{{$logo}}" alt="{{$title}}">
        <h1>{{$title}}</h1>
    </div>
    <div class="navigation">
        <ul>
            <li><i class='bx bx-home'></i><a href="/">صفحه اصلی</a></li>
            @foreach($widgets as $item)
            <li><i class='{{$item['icon']}}' ></i><a href="/w/{{$item['slug']}}">{{$item['name']}}</a></li>
            @endforeach
            <li><i class='bx bx-phone-call' ></i><a href="/contact">تماس با من</a></li>
        </ul>
    </div>
</div>