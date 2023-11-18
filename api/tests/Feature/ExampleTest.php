<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\Response;

test('Route web default')
    ->get('/')
    ->assertOk()
    ->assertSee('.');

test('Route api default')
    ->get('/api')
    ->assertOk()
    ->assertJson([
        'data' => [],
        'status' => [
            'code' => Response::HTTP_OK,
            'message' => 'OK',
            'success' => true,
        ],
    ]);
