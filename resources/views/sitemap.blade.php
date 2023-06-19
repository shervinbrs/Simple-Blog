<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
		<loc>{{route('home')}}</loc>
	</url>
    <url>
		<loc>{{route('contact')}}</loc>
	</url>
    @foreach ($widgets as $item)
    <url>
		<loc>{{URL::asset('/w')}}/{{$item['slug']}}</loc>
		<lastmod>{{$item['updated_at']}}:03+00:00</lastmod>
	</url> 
    @endforeach
    @foreach ($posts as $item)
    <url>
		<loc>{{URL::asset('/post')}}/{{$item['slug']}}</loc>
		<lastmod>{{$item['updated_at']}}:03+00:00</lastmod>
        <image:image>
			<image:loc>{{URL::asset('/storage')}}/{{$item['thumbnail']}}</image:loc>
		</image:image>
	</url> 
    @endforeach
</urlset>