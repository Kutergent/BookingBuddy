<x-app-layout>


	<div class="container p-2 mx-auto sm:p-4 text-gray-900">
		<h2 class="mb-4 text-2xl font-semibold leading-tight">Customer Report</h2>

		<hr class="my-4">
		<!-- Datepicker -->
		<form action="{{ route('report') }}" method="GET">
		<div date-rangepicker class="flex items-center mb-2 item">
  			<div class="relative">
    			<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        			<svg aria-hidden="true" class="w-5 h-5 text-gray-500 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
    			</div>
    			<input name="start" type="text" class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Select date start">
  			</div>
  			<span class="mx-4 text-gray-700">to</span>
  			<div class="relative">
    			<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        			<svg aria-hidden="true" class="w-5 h-5 text-gray-500 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
    			</div>
    			<input name="end" type="text" class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Select date end">
  			</div>

			<span class="mx-4 text-gray-700">
				<x-primary-button class="ml-2">
                    {{ __('Save') }}
                  </x-primary-button>
			</span>

		</div>
		</form>




		<div class="overflow-x-auto">
			<table class="min-w-full text-xs">
				<colgroup>
					<col>
					<col>
					<col>
					<col>
					<col>
					<col class="w-24">
				</colgroup>
				<thead class="bg-gray-200">
					<tr class="text-left">
						<th class="p-3 font-medium text-base">Name</th>
						<th class="p-3 font-medium text-base">Email</th>
						<th class="p-3 font-medium text-base">Phone</th>
						<th class="p-3 font-medium text-base">Date of Birth</th>
						<th class="p-3 font-medium text-base text-right">Reserve Date</th>
						<th class="p-3 font-medium text-base text-right">Duration</th>
						<th class="p-3 font-medium text-base text-right">Status</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($report as $r)
					<tr class="border-b border-opacity-20 bg-white">
						<td class="p-3 font-medium text-sm">
							<p>{{ $r->name }}</p>
						</td>
						<td class="p-3 font-medium text-sm">
							<p>{{ $r->email }}</p>
						</td>
						<td class="p-3 font-medium text-sm">
							<p>{{ $r->phone_number }}</p>
						</td>
						<td class="p-3 font-medium text-sm">
							<p>{{ $r->dob }}</p>
						</td>
							<td class="p-3 font-medium text-sm text-right">
							<p>{{ $r->reserve_date }}</p>
							<p class="text-gray-400">Tuesday</p>
						</td>
						</td>
							<td class="p-3 font-medium text-sm text-right">
							<p>{{ $r->reserve_duration }}</p>
						</td>
						<td class="p-3 font-medium text-sm text-right">
							<span class="px-3 py-1 font-semibold rounded-md bg-teal-400 text-gray-900">
								<span>Pending</span>
							</span>
						</td>
					</tr>
					@endforeach



				</tbody>
			</table>

			<!-- pagination -->
			<!-- {{ $report->appends(request()->query())->links() }} -->
			{{ $report->links() }}
		</div>
	</div>


</x-app-layout>


