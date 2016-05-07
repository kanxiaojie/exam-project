<div class="mainpanel">
    <div class="contentpanel">
        <div class="panel-body">
            <h4>{{ $ifLinked }}考试</h4>
            <hr/>

            <form method="post" action="/courses/{{ $id }}/linkExams/{{ $ifLink }}">
                {{ csrf_field() }}

                <table id="{{ $my_table }}" class="table table-bordered text-center">
                    <thead class="dynatable-active-page">
                    <tr>
                        <th>
                            <input type="checkbox" id="{{ $checkButton }}" {{$ifCheck}} />
                        </th>
                        <th>课程名称</th>
                        <th>课程描述</th>
                        <th>相关模块</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ifLinkExams as $exam)
                        <tr>
                            <td>
                                <input type="checkbox" class="{{ $check }}" name="exam[]"
                                       value="{{ $exam->id }}" {{ $ifCheck }}>
                            </td>
                            <td>{{ $exam->name }}</td>
                            <td>{{ $exam->description }}</td>
                            <td>
                                @foreach($exam->modules()->orderBy('name')->get() as $module)
                                    {{ $module->name }}&nbsp;&nbsp;
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="text-center" style="margin-top: 40px; margin-bottom: 20px">
                    <button type="submit" class="button button-border button-rounded {{ $button_type }}">{{ $button_name }}</button>
                </div>
            </form>
        </div>
    </div>
</div>