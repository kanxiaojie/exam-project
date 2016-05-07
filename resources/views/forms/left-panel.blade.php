<div class="leftpanel">
    <ul class="nav nav-pills nav-stacked text-center">
        <li id="editNav"><a href="/courses/{{ $course->id }}/edit">课程更新</a></li>
        <li id="linkStudentsNav"><a href="/courses/{{ $course->id }}/linkStudents">关联学生</a></li>
        <li id="linkCourseTimesNav"><a href="/courses/{{ $course->id }}/linkCourseTimes">关联课时</a></li>
        <li id="linkExamsNav"><a href="/courses/{{ $course->id }}/linkExams">关联考核</a></li>
        <li id="gradesNav"><a href="/courses/{{ $course->id }}/grades">查询成绩</a></li>
        <li id="deleteNav"><a href="/courses/{{ $course->id }}/delete">课程删除</a></li>
    </ul>
</div>

@section('scripts')
    <script>
        var getExamNavPath = location.pathname.split("/");
        getExamNavPathName = getExamNavPath[3];
        var examNavbarDict = ['edit', 'delete', 'linkStudents', 'linkCourseTimes', 'linkExams', 'grades'];

        $(document).ready(function(){
            if(examNavbarDict.indexOf(getExamNavPathName) >= 0){
                $("#"+getExamNavPathName+'Nav').addClass("active");
            }
        });

        $("#checkUsersButton").change(function(){
            if($(this).is(":checked")){
                $("input.checkUsers:checkbox:not(:checked)").prop('checked', true);
            }else {
                $("input.checkUsers:checkbox:checked").prop('checked', false);
            }
        });

        $("#unCheckUsersButton").change(function(){
            if($(this).is(":checked")){
                $("input.unCheckUsers:checkbox:not(:checked)").prop('checked', true);
            }else {
                $("input.unCheckUsers:checkbox:checked").prop('checked', false);
            }
        });
    </script>
@stop