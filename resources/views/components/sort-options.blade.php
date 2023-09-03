<form id="sortForm" action="{{ route('user.list.sort') }}" method="GET"
    class="flex p-1 mr-4 !bg-white rounded border-solid border-gray-500 shadow-2">
    <select id="sort-options" name="sort_order" onchange="submitForm()" class="border-none">
        <option value="" selected disabled hidden>並び替え：評価高/低</option>
        <option value="random">ランダム</option>
        <option value="high">評価が高い順</option>
        <option value="low">評価が低い順</option>
    </select>
</form>

<script>
    function submitForm() {
        document.getElementById('sortForm').submit();
    }
</script>
