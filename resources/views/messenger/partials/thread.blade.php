


<tr class="{{ $thread->isUnread(Auth::id()) ? 'font-bold' : '' }}">
    <td class="text-sm bg-white border-b border-gray-200">
        <a class="hover:underline" href="{{ route('messages.show', $thread) }}">{{ $thread->name }}</a>
    </td>
    <td class="text-sm bg-white border-b border-gray-200">
        <a class="hover:underline" href="{{ route('messages.show', $thread) }}">{{ $thread->subject }}</a>
    </td>
    <td class="text-sm bg-white border-b border-gray-200">
            <a class="hover:underline" href="{{ route('messages.show', $thread) }}">{{ $thread->latestMessage->body }}</a>
        </td>
    <td style="text-align: center;width: 15%" class="text-sm bg-white border-b border-gray-200">
        <form action="{{ route('messages.destroy', $thread) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" style="width: 120px">Delete</button>
        </form>
    </td>
</tr>
