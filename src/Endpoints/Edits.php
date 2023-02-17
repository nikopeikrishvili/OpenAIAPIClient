<?php

declare(strict_types=1);

namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints;

use Http\Client\Exception;
use NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Requests\EditsRequest;
use NikoPeikrishvili\OpenAIAPIClient\ResponseMediator;

class Edits extends Endpoint
{
    /**
     * @param EditsRequest $request
     * @return array
     * @throws Exception
     */
    public function generate(EditsRequest $request): array
    {
        $data = [];
        $data['model'] = $request->getModel();
        $data['instruction'] = $request->getInstruction();
        $data['input'] = $request->getInput();
        $data['n'] = $request->getN();
        $data['temperature'] = $request->getTemperature();
        $data['top_p'] = $request->getTopP();
        foreach ($data as $key => $value) {
            if (is_null($value)) {
                unset($data[$key]);
            }
        }
        return ResponseMediator::getContent($this->chatGPT->getHttpClient()->post('/edits', [], json_encode($data)));
    }
}