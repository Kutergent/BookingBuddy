<x-app-layout>



	<div class="container p-2 mx-auto sm:p-4 text-gray-900">
		<h2 class="mb-4 text-2xl font-semibold leading-tight">Customer Report</h2> DATEPICKER
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
							<p class="text-gray-400">Tuesday</p>
						</td>
							<td class="p-3 font-medium text-sm text-right">
							<p>{{ $r->reserve_date }}</p>
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
			{{ $report->links() }}

		</div>
	</div>


</x-app-layout>


