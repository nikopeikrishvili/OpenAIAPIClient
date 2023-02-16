<?php

declare(strict_types=1);

namespace NikoPeikrishvili\ChatGPTClient\Endpoints;

use NikoPeikrishvili\ChatGPTClient\Endpoints\DTO\Requests\CompletionRequest;
use NikoPeikrishvili\ChatGPTClient\ResponseMediator;

class Completion extends Endpoint
{
    public function generate(CompletionRequest $request){
        $data = [];
        $data['model'] = $request->getModel();
        $data['prompt'] = $request->getPrompt();
        $data['max_tokens'] = $request->getMaxTokens();
        $data['temperature'] = $request->getTemperature();
        $data['top_p'] = $request->getTopP();
        $data['n'] = $request->getN();
        $data['stream'] = $request->getStream();
        $data['logprobs'] = $request->getLogprobs();
        $data['stop'] = $request->getStop();
        $data['suffix'] = $request->getSuffix();
        $data['best_off'] = $request->getBestOf();
        $data['echo'] = $request->getEcho();
        $data['frequency_penalty'] = $request->getFrequencyPenalty();
        $data['presence_penalty'] = $request->getPresencePenalty();
        $data['logit_bias'] = $request->getLogitBias();
       foreach ($data as $key=>$value){
           if(is_null($value)){
               unset($data[$key]);
           }
       }
       return ResponseMediator::getContent($this->chatGPT->getHttpClient()->post('/completions',[], json_encode($data)));
    }
}