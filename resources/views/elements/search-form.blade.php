<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">検索ワードを入力し検索ボタンをクリックしてください。</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {{ Form::open(['route' => 'search', 'method' => 'get']) }}
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::text('search_keyword', Request::input('search_keyword', null), ['class' => 'form-control', 'placeholder' => '例) 大分　温泉']) }}
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">検索</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>