<?php

namespace App\Services;

use Illuminate\Http\Request;

class MyUserQuery {
  
      public function transform(Request $request) {
          $queryItems = [];
          $queryItems = $this->addQueryItem($queryItems, $request, 'name', 'like');
          $queryItems = $this->addQueryItem($queryItems, $request, 'username', 'like');
          $queryItems = $this->addQueryItem($queryItems, $request, 'is_active', '=');
          $queryItems = $this->addQueryItem($queryItems, $request, 'province_code', '=');
          $queryItems = $this->addQueryItem($queryItems, $request, 'district_code', '=');
          $queryItems = $this->addQueryItem($queryItems, $request, 'subdistrict_code', '=');
          return $queryItems;
      }
  
      private function addQueryItem($queryItems, $request, $column, $operator) {
          $value = $request->input($column);
          if ($value != null) {
              $queryItems[] = [$column, $operator, $value];
          }
          return $queryItems;
      }
}