<?php

namespace App\Services;

use JetBrains\PhpStorm\NoReturn;
use Spatie\Crypto\Rsa\KeyPair;
use Spatie\Crypto\Rsa\PrivateKey;
use Spatie\Crypto\Rsa\PublicKey;
use function PHPUnit\Framework\returnArgument;

final class  EncryptionService
{
    private int $partnerId;
    private string $pathToPrivateKey = "keys/uk-private.key";
    private string $pathToPublicKey = "keys/uk-public.key";

    public function __construct(int $partnerId)
    {
        $this->partnerId = $partnerId;
    }

    #[NoReturn] public final function keyPayer(): string
    {
        [$privateKey, $publicKey] = (new KeyPair())->generate();

        (new KeyPair())->generate(storage_path($this->pathToPrivateKey), storage_path($this->pathToPublicKey));

        return $publicKey;
    }

    public static function verify(string $data, string $signature): bool
    {
        $publicKey = PublicKey::fromFile(storage_path('keys/uk-public.key'));
        try {
            return $publicKey->verify($data,$signature); // r
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    public static function encrypt(): string
    {
        $privateKey = PublicKey::fromFile(storage_path('keys/uk-public.key'));
        return  base64_encode($privateKey->encrypt(json_encode(['partner' => 'UK', 'id' => '001']))); // returns something unreadable
    }

    public static function canDecrypt(string $token): bool
    {
        $privateKey = PrivateKey::fromFile(storage_path('keys/uk-private.key'));
        return $privateKey->canDecrypt(base64_decode($token));
    }
}
