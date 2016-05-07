<div class="leftpanel">
    <ul class="nav nav-pills nav-stacked text-center">
        <li id="editNav"><a href="/courses/{{ $course->id }}/edit">课程更新</a></li>
        <li><a href="#">关联学生</a></li>
        <li><a href="#">关联课时</a></li>
        <li><a href="#">关联考核</a></li>
        <li><a href="#">查询成绩</a></li>
        <li id="deleteNav"><a href="/courses/{{ $course->id }}/delete">课程删除</a></li>
    </ul>
</div>

@section('scripts')
    <script>
        var getExamNavPath = location.pathname.split("/");
        getExamNavPathName = getExamNavPath[3];
        var examNavbarDict = ['edit', 'delete'];

        $(document).ready(function(){
            if(examNavbarDict.indexOf(getExamNavPathName) >= 0){
                $("#"+getExamNavPathName+'Nav').addClass("active");
            }
        });
    </script>
@stop