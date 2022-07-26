@extends('layouts_admin.main')
@section('title', 'Danh sách voucher')
@section('page-title', 'Danh sách voucher')
@section('content')
    <div>
        <x-index :links="[]" :data="$vouchers->toArray()" :route_create="'admin.voucher.create'" :route_update="'admin.voucher.edit'" :route_delete="'admin.voucher.destroy'">
        </x-index>
        <div class="mt-10">

            {{ $vouchers->appends(request()->all())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('page-script')
@endsection
