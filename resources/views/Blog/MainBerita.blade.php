@extends('layout')
@section('content')
    <link rel="stylesheet" type="text/css" href="styles/blog_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">
    <link href="/assets/front/vendor/animate.css/animate.min.css" rel="stylesheet">
<section id="berita" class="berita">       
    <div class="super_container">
        
        

        <!-- Home -->

        <div class="home">
            <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/blog_background.jpg"></div>
            <div class="home_content">
                <div class="home_title">Berita</div>
            </div>
        </div>

        <!-- Blog -->
        
        <div class="blog">
            
            <div class="container">
                
                <div class="row">

                    <!-- Blog Content -->
                    
                    
                    <div class="col-lg-8">
                        <div class="form-group">
                            <div class="container s003">
                                <form action="{{route('main.berita')}}" method="GET">
                                    <div class="inner-form">
                                        <div class="input-field first-wrap">
                                            <div class="input-field">
                                                <select data-trigger="" name="kategori">
                                                    <option value="">Semua Kategori</option>
                                                    
                                                        <option value="" ></option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-field second-wrap">
                                            <input name="judul" type="text" value="{{request()->input('judul')}}" placeholder="Cari...." />
                                        </div>
                                        <div class="input-field third-wrap">
                                            <button class="btn-search" type="submit">
                                                <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas"
                                                    data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path fill="currentColor"
                                                        d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card-group ">
                                
                            <div class="card-columns">
                            @foreach ($berita as $b)
                                <!-- Blog Post -->
                                <div class="card">
                                    
                                        <div class="blog_post_image">
                                            <img src="/assets/images/berita/{{ $b->foto }}">
                                            
                                        </div>
                                        <div class="blog_post_meta">
                                            <ul>
                                                
                                                <li class="blog_post_meta_item"><a href="">{{ $b->kategori->nama }}</a></li>
                                                <li class="blog_post_meta_item"><a href="">{{ $b->created_at->format('j-F-Y') }}</a></li>
                                                
                                                
                                            </ul>
                                        </div>
                                        <div class="" style="font-size: 15px; font-weight: bold; margin-left: 0.5rem; margin-right: 0.5rem;"><a href="{{ route('main.berita.detail', $b->slug) }}">{{ $b->judul }}</a></div>
                                        
                                        <a href="{{ route('main.berita.detail', $b->slug) }}"> <div class="blog_post_link" style="margin-left: 6rem;">READ MORE</div></a>
                                    
                                </div>
                            @endforeach

                                

                                
                                
                                @if ($berita->hasPages())
                                <ul class="pagination" role="navigation" style="display: flex;justify-content: center;align-items: center;margin-top:25px">
                                    {{-- Previous Page Link --}}
                                    @if ($berita->onFirstPage())
                                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $berita->appends(['judul' => request()->input('judul'), 'kategori' => request()->input('kategori')])->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                        </li>
                                    @endif
                
                                    <?php
                                        $start = $berita->currentPage() - 2; // show 3 pagination links before current
                                        $end = $berita->currentPage() + 2; // show 3 pagination links after current
                                        if($start < 1) {
                                            $start = 1; // reset start to 1
                                            $end += 1;
                                        } 
                                        if($end >= $berita->lastPage() ) $end = $berita->lastPage(); // reset end to last page
                                    ?>
                
                                    @if($start > 1)
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $berita->appends(['judul' => request()->input('judul'), 'kategori' => request()->input('kategori')])->url(1) }}">{{1}}</a>
                                        </li>
                                        @if($berita->currentPage() != 4)
                                            {{-- "Three Dots" Separator --}}
                                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                                        @endif
                                    @endif
                                        @for ($i = $start; $i <= $end; $i++)
                                            <li class="page-item {{ ($berita->currentPage() == $i) ? ' active' : '' }}">
                                                <a class="page-link" href="{{ $berita->appends(['judul' => request()->input('judul'), 'kategori' => request()->input('kategori')])->url($i) }}">{{$i}}</a>
                                            </li>
                                        @endfor
                                    @if($end < $berita->lastPage())
                                        @if($berita->currentPage() + 3 != $berita->lastPage())
                                            {{-- "Three Dots" Separator --}}
                                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                                        @endif
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $berita->appends(['judul' => request()->input('judul'), 'kategori' => request()->input('kategori')])->url($berita->lastPage()) }}">{{$berita->lastPage()}}</a>
                                        </li>
                                    @endif
                
                                    {{-- Next Page Link --}}
                                    @if ($berita->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $berita->appends(['judul' => request()->input('judul'), 'kategori' => request()->input('kategori')])->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                        </li>
                                    @endif
                                </ul>
                            @endif
                            </div>
                                
                                    
                                
                            </div>
                    </div>

                    <!-- Blog Sidebar -->
                    
    @include('Blog.sidebar-blog')
                    
                </div>
            </div>
        </div>
    </section>


        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="styles/bootstrap4/popper.js"></script>
        <script src="styles/bootstrap4/bootstrap.min.js"></script>
        <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
        <script src="plugins/parallax-js-master/parallax.min.js"></script>
        <script src="js/blog_custom.js"></script>

@push('scripts')
<script>
    const choices = new Choices('[data-trigger]', {
        searchEnabled: false,
        itemSelectText: '',
    });
</script>
@endpush   
    


@endsection

