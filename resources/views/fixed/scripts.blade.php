@if(request()->routeIs("admin.admin") || request()->routeIs("addPost") || request()->routeIs("post.edit"))
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endif
<script src="{{asset("assets/js/jquery.min.js")}}"></script>
<!-- Popper -->
<script src="{{asset("assets/js/popper.min.js")}}"></script>
<!-- Bootstrap -->
<script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
<!-- All Plugins -->
<script src="{{asset("assets/js/roberto.bundle.js")}}"></script>
<!-- Active -->
<script src="{{asset("assets/js/default-assets/active.js")}}"></script>

<script src="{{asset("assets/js/myScript/main.js")}}"></script>
{{--izbrisi assets--}}
