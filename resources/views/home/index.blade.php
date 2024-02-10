{{ $title }}

<form method="post" action="/name">
@csrf
@method('patch')
<input name="name">
<input name="date">
<input name="sort">
<input type="submit">
</form>
