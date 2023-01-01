<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use OpenAI;

class ProfileGeneratorController extends Controller
{
    public function __invoke(
        Request $request,
    ): View {
        $openAIClient = OpenAI::client(config('openai.api-key'));
        $profileContent = $request->get('content');

        $profile = $openAIClient
            ->completions()
            ->create([
                "model" => "text-davinci-003",
                "temperature" => 0.7,
                "top_p" => 1,
                "frequency_penalty" => 0,
                "presence_penalty" => 0,
                'max_tokens' => 600,
                'prompt' => "écris-moi un profil pour {$profileContent}",
            ]);

        return view('profile_generators.create', [
            'profile' => trim($profile->choices[0]->text),
        ]);
    }
}
