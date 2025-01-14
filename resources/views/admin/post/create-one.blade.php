@extends('layouts.admin.master')
@section('title')
المحتوى
@endsection
@section('page-title')
 نشر فيديو
@endsection
@section('body')

<body data-sidebar="colored">
    @endsection
    @section('content')
    <!--  Start your content -->
    <div class="container-fluid">
        <div class="row">
            <!-- العمود الأول: معلومات المنشور -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">إضافة منشور فيديو</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.posts.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="video">
                            <div class="mb-3">
                                <label for="video-title" class="form-label">عنوان الفيديو</label>
                                <input type="text" class="form-control" id="video-title" name="title"
                                    placeholder="أدخل عنوان الفيديو" required style="text-align: right;direction: rtl">
                            </div>
                            <div class="mb-3">
                                <label for="video-description" class="form-label">وصف الفيديو</label>
                                <textarea class="form-control" id="video-description" name="description" rows="4"
                                    placeholder="أدخل وصف الفيديو" style="direction: rtl"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="video-url" class="form-label">رابط الفيديو (يوتيوب)</label>
                                <input type="url" class="form-control" id="video-url" name="video_url"
                                    placeholder="أدخل رابط الفيديو" required style="text-align: right;direction: rtl">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">نشر الفيديو</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    
            <!-- العمود الثاني: معاينة المنشور -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">معاينة المنشور</h4>
                    </div>
                    <div class="card-body">
                        <div id="post-preview">
                            <h5 id="preview-title" class="mb-3">عنوان الفيديو</h5>
                            
                            <p id="preview-description" class="mb-3" style="white-space: pre-wrap;word-wrap: break-word;">وصف الفيديو سيظهر هنا...</p>
                            <div class="ratio ratio-16x9">
                                <iframe id="preview-video" src="https://www.youtube.com/embed/placeholder" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <!-- App js -->
    <script src="{{asset('build/js/app.js')}}"></script>
    <script>
        // تحديث المعاينة
        document.getElementById('video-title').addEventListener('input', function() {
            document.getElementById('preview-title').textContent = this.value || 'عنوان الفيديو';
        });
    
        document.getElementById('video-description').addEventListener('input', function() {
            document.getElementById('preview-description').textContent = this.value || 'وصف الفيديو سيظهر هنا...';
        });
    
        document.getElementById('video-url').addEventListener('input', function() {
            const url = this.value;
            const videoId = url.split('v=')[1] || 'placeholder';
            document.getElementById('preview-video').src = `https://www.youtube.com/embed/${videoId}`;
        });
    </script>
    @endsection