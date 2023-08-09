<x-app-layout>




        <div class="flex flex-row h-3/6">
            <div class="w-2/3 mr-2 bg-white rounded shadow-sm p-4 px-4">
                {!! $mr->container() !!}
            </div>
            <div class="w-1/3 bg-white rounded shadow-sm p-4 px-4">
                {!! $rs->container() !!}
            </div>
        </div>
        <div class="w-full h-1/6 mt-2 bg-white rounded shadow-sm p-4 px-4">
            {!! $rf->container() !!}
        </div>
        <div class="flex flex-row mt-2 h-3/6">
            <div class="w-1/2 mr-2 bg-white rounded shadow-sm p-4 px-4">
                {!! $dr->container() !!}
            </div>
            <div class="w-1/2 bg-white rounded shadow-sm p-4 px-4">

                {!! $cr->container() !!}
            </div>
        </div>




    {!! $mr->script() !!}
    {!! $rs->script() !!}
    {!! $dr->script() !!}
    {!! $cr->script() !!}
    {!! $rf->script() !!}

</x-app-layout>
