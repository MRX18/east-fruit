<div class="wrepper">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('excel') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleFormControlFile1">Excel файл</label>
            <input type="file" name="excel" class="form-control-file" id="exampleFormControlFile1">
        </div>

        <div class="form-group">
            <label for="sel1">Страны:</label>
            <select class="form-control" id="sel1" name="markets">
                @foreach($market as $m)
                    <option value="{{ $m->id }}">{{ $m->market }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="sel1">Валюта:</label>
            <select class="form-control" id="sel1" name="currencies">
                @foreach($currency as $c)
                    <option value="{{ $c->charCode }}">{{ $c->currency }}</option>
                @endforeach
            </select>
        </div>

        <div class="date">
            <label for="sel1">Дата:</label><br>
            <input type="date" name="date" value="<?php echo date("Y-m-d");?>">
        </div><br>

        <button class="btn btn-primary" type="submit">Добавить</button>
    </form>
</div>