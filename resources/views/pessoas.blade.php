@extends('layouts.app')

@section('content')


<v-container fluid>
    <v-row justify="center" row >
        <div class="display-2 primary--text text-center">
            Pessoas
        </div>
    </v-row>
</v-container>


<v-container fluid>
    <v-row align="start" justify="center" wrap >
        <v-col cols="12" md="10">
            <v-btn :href="'/home'" color="white" class="mb-2"> <jb-icon dark color="primary" small class="pr-1"> fas fa-home </jb-icon> Home </v-btn>
            <crud-pessoas
                :pessoas="{{json_encode($pessoas)}}"
                :papeis="{{json_encode($papeis)}}"
            />
        </v-col>
    </v-row>
</v-container>


@endsection
