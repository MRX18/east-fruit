<div class="conteiner" style="background-color: #fff; padding: 15px;">
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Имя</label>
            <input type="text" class="form-control" placeholder="Имя" disabled value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="text" class="form-control" placeholder="Email" disabled value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Опублтковано в течении 1 часа</label>
            <input type="text" class="form-control" placeholder="Опублтковано в течении 1 часа" disabled value="{{ $hoursCount }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Опублтковано в течении 1 дня</label>
            <input type="text" class="form-control" placeholder="Опублтковано в течении 1 дня" disabled value="{{ $deyCount }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Опублтковано в течении 1 недели</label>
            <input type="text" class="form-control" placeholder="Опублтковано в течении 1 недели" disabled value="{{ $nedCount }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Опублтковано в течении 1 месяца</label>
            <input type="text" class="form-control" placeholder="Опублтковано в течении 1 месяца" disabled value="{{ $monthCount }}">
        </div>
    </form>
</div>