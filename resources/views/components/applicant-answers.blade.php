@props([
   'question',
   'answer' 
])
<tr class="bg-white">
   <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $question }}</td>
   <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $answer }}</td>
</tr>