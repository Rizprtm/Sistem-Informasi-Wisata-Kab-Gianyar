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
                                  <div class="input-group mb-3">
                                    <select data-trigger="" class="dropdown_item_select search_input input-sm" name="kategori">
                                        <option value="">Semua Kategori</option>
                                            @foreach ($kategoriberita as $kb)
                                                <option value="{{ $kb->slug }}" {{ request()->input('kategori') == $kb->slug ? 'selected' : ''}}>{{ $kb->nama }}</option>
                                            @endforeach
                                        
                                    </select>
                                    
                                    <input type="text" name=judul class="destination search_input" value="{{request()->input('judul')}}" placeholder="Cari...." aria-label="Text input with segmented dropdown button">
                                  </div>
                                </form>
                                
                            </div>
                        </div>

                        <div class="card-group ">
                                
                            <div class="card-columns">
                            @foreach ($berita as $b)
                                <!-- Blog Post -->
                                <div class="card">
                                    <div class="card-header text-center">
                                        {{ $b->kategori->nama }}
                                    </div>
                                    <img class="card-img-top" src="/assets/images/berita/{{ $b->foto }}" alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title text-center"><a href="{{ route('main.berita.detail', $b->slug) }}">{{ $b->judul }}</a></h5>
                                      
                                      <div class="text-center"><a href="{{ route('main.berita.detail', $b->slug) }}" class="btn btn-primary">Read More</a></div>
                                    </div>
                                  </div>
                                {{-- <div class="card">
                                    
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
                                    
                                </div> --}}
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

