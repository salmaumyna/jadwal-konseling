<?php

namespace App\Traits;

trait EnumCast
{

  public static function castFromName(string $name): \BackedEnum
  {
      foreach (self::cases() as $status) {
          if( $name === $status->name ){
              return $status;
          }
      }
      throw new \ValueError("$name is not a valid backing name for enum " . self::class );
  }

  public static function castFromValue(string $value): \BackedEnum
  {
      foreach (self::cases() as $status) {
        if( $value === $status->value ){
            return $status;
        }
      }

      throw new \ValueError("$value is not a valid backing value for enum " . self::class );
  }
}
