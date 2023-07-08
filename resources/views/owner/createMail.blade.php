<x-guest-layout>

    <form action="{{ route('owner.mail.send') }}" method="post">
        @csrf
        <input type="hidden" name="username" value="{{ $user->name }}">
        <input type="hidden" name="useremail" value="{{ $user->email }}">

        <p>ユーザー名</p>
        <p>{{ $user->name }}</p>
        <p>メールアドレス</p>
        <p>{{ $user->email }}</p>
        <p>件名</p>
        <input type="text" name="subject" value="{{ old('subject') }}">
        <p>メッセージ</p>
        <textarea id="message" name="message" rows="10" required>{{ old('message') }}</textarea>
        <div class="flex justify-center pl-4 mt-10 w-full mx-auto">
            <button type="submit"
                class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">送信する
            </button>
        </div>
    </form>
</x-guest-layout>
