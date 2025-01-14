@extends('layouts.admin.master')
@section('title')
المحتوى
@endsection
@section('page-title')
ادارة المحتوى
@endsection
@section('body')

<body data-sidebar="colored">
    @endsection
    @section('content')
    <!--  Start your content -->

    <!--  Start your content -->
    <div class="row">
        <div class="col-xl-3">
            <div class="card filemanager-sidebar">
                <div class="card-body">
                    <div class="d-flex flex-column h-100">
                        <div>
                            <div class="mb-3">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle w-100" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-plus me-1"></i> أضف منشور جديد
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.posts.create-video')}}">
                                            <i class="ri-video-line me-1"></i> فيديو
                                        </a>
                                        <a class="dropdown-item" href="{{route('admin.posts.create-image')}}">
                                            <i class="ri-image-line me-1"></i> صور
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <h5 class="font-size-16 mt-4 mb-0">إحصاءيات بسيطة عن المنشورات</h5>

                        <div class="border text-center rounded p-3 mt-4">
                            <div class="">
                                <img src="{{ URL::asset('build/images/upgrade-img.png') }}" class="img-fluid"
                                    style="width: 108px;" alt="">
                            </div>
                            <div class="row text-center mt-4">
                                <div class="col-md-4">
                                    <h2 class="mb-1"><i class="ri-file-list-line text-primary"></i></h2>
                                    <h6 class="mb-1"> إجمالي المنشورات</h6>
                                    <p class="text-muted mb-0"><strong>{{ $totalPosts }}</strong></p>
                                </div>
                                <div class="col-md-4">
                                    <h2 class="mb-1"><i class="ri-video-line text-success"></i></h2>
                                    <h6 class="mb-1"> منشورات الفيديو</h6>
                                    <p class="text-muted mb-0"><strong>{{ $videoPosts }}</strong></p>
                                </div>
                                <div class="col-md-4">
                                    <h2 class="mb-1"><i class="ri-image-line text-warning"></i></h2>
                                    <h6 class="mb-1"> منشورات الصور</h6>
                                    <p class="text-muted mb-0"><strong>{{ $imagePosts }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="form-inline float-md-start mb-3">
                                <div class="search-box me-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control border" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    @if($posts->count())
                    <div class="table-responsive mb-2">
                        <table class="table table-hover table-nowrap align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        #
                                    </th>
                                    <th>العنوان</th>
                                    <th>النوع</th>
                                    <th>أنشئ بواسطة</th>
                                    <th>تاريخ الإنشاء</th>
                                    <th scope="col" style="width: 200px;">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->type == 'video' ? 'فيديو' : 'صور' }}</td>
                                    <td>{{ $post->creator->name ?? 'غير معروف' }}</td>
                                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post->id) }}"
                                            class="btn btn-info btn-sm">عرض</a>
                                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                                            class="btn btn-warning btn-sm">تعديل</a>
                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @else
                    <p class="text-center">لا توجد منشورات.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!-- Modal لإضافة فيديو -->
    <div class="modal fade" id="addVideoPostModal" tabindex="-1" aria-labelledby="addVideoPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVideoPostModalLabel">إضافة منشور فيديو</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label for="video-title" class="form-label">عنوان الفيديو</label>
                            <input type="text" class="form-control" id="video-title" name="title"
                                placeholder="أدخل عنوان الفيديو" required>
                        </div>
                        <div class="mb-3">
                            <label for="video-description" class="form-label">وصف الفيديو</label>
                            <textarea class="form-control" id="video-description" name="description" rows="3"
                                placeholder="أدخل وصف الفيديو"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="video-url" class="form-label">رابط الفيديو</label>
                            <input type="url" class="form-control" id="video-url" name="video_url"
                                placeholder="أدخل رابط الفيديو" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary w-sm">إضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal لإضافة صور -->
    <div class="modal fade" id="addImagePostModal" tabindex="-1" aria-labelledby="addImagePostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addImagePostModalLabel">إضافة منشور صور</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label for="image-title" class="form-label">عنوان المنشور</label>
                            <input type="text" class="form-control" id="image-title" name="title"
                                placeholder="أدخل عنوان المنشور" required>
                        </div>
                        <div class="mb-3">
                            <label for="image-description" class="form-label">وصف المنشور</label>
                            <textarea class="form-control" id="image-description" name="description" rows="3"
                                placeholder="أدخل وصف المنشور"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image-files" class="form-label">رفع الصور</label>
                            <input type="file" class="form-control" id="image-files" name="images[]" multiple required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary w-sm">إضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <!-- App js -->
    <script src="{{asset('build/js/app.js')}}"></script>
    @endsection