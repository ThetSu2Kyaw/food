<x-frontend-layout>
    <rest-component :restaurant="{{json_encode($restaurant)}}" :order_id="{{$order->id}}"></rest-component>
</x-frontend-layout>