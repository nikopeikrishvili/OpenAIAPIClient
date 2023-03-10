<?php

declare(strict_types=1);
namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Requests;
use InvalidArgumentException;

class CompletionRequest
{
    /**
     * ID of the model to use. You can use the List models API to see all of your available models, or see our Model overview for descriptions of them.
     * @var string
     */
    private string $model;
    private ?string $prompt = null;
    /**
     * The suffix that comes after a completion of inserted text.
     * @var string|null
     */
    private ?string $suffix = null;
    /**
     *  The maximum number of tokens to generate in the completion.
     * The token count of your prompt plus max_tokens cannot exceed the model's context length. Most models have a context length of 2048 tokens (except for the newest models, which support 4096).
     * @var int|null
     */
    private ?int $maxTokens = null;

    /**
     * What sampling temperature to use, between 0 and 2. Higher values like 0.8 will make the output more random, while lower values like 0.2 will make it more focused and deterministic.
     * We generally recommend altering this or top_p but not both.
     * @var int|null
     */
    private ?int $temperature = null;

    /**
     * An alternative to sampling with temperature, called nucleus sampling, where the model considers the results of the tokens with top_p probability mass. So 0.1 means only the tokens comprising the top 10% probability mass are considered.
     * We generally recommend altering this or temperature but not both.
     * @var int|null
     */
    private ?int $topP = null;

    /**
     * How many completions to generate for each prompt.
     * Note: Because this parameter generates many completions, it can quickly consume your token quota. Use carefully and ensure that you have reasonable settings for max_tokens and stop.
     * @var int|null
     */
    private ?int $n = null;

    /**
     * Whether to stream back partial progress. If set, tokens will be sent as data-only server-sent events as they become available, with the stream terminated by a data: [DONE] message.
     * @var bool|null
     */
    private ?bool $stream = null;

    /**
     * Include the log probabilities on the logprobs most likely tokens, as well the chosen tokens. For example, if logprobs is 5, the API will return a list of the 5 most likely tokens. The API will always return the logprob of the sampled token, so there may be up to logprobs+1 elements in the response.
     * The maximum value for logprobs is 5. If you need more than this, please contact us through our Help center and describe your use case.
     * @var string|null
     */
    private ?string $logprobs = null;

    /**
     * Echo back the prompt in addition to the completion
     * @var bool|null
     */
    private ?bool $echo = null;

    /**
     * Up to 4 sequences where the API will stop generating further tokens. The returned text will not contain the stop sequence.
     * @var string|null
     */
    private ?string $stop = null;

    /**
     * Number between -2.0 and 2.0. Positive values penalize new tokens based on whether they appear in the text so far, increasing the model's likelihood to talk about new topics.
     * See more information about frequency and presence penalties.
     * @var float|null
     */
    private ?float $presencePenalty = null;
    /**
     * Number between -2.0 and 2.0. Positive values penalize new tokens based on their existing frequency in the text so far, decreasing the model's likelihood to repeat the same line verbatim.
     * See more information about frequency and presence penalties.
     * @var float|null
     */
    private ?float $frequencyPenalty = null;

    /**
     * Generates best_of completions server-side and returns the "best" (the one with the highest log probability per token). Results cannot be streamed.
     * When used with n, best_of controls the number of candidate completions and n specifies how many to return ??? best_of must be greater than n.
     * Note: Because this parameter generates many completions, it can quickly consume your token quota. Use carefully and ensure that you have reasonable settings for max_tokens and stop.
     * @var int|null
     */
    private ?int $bestOf = null;

    /**
     * Modify the likelihood of specified tokens appearing in the completion.
     * Accepts a json object that maps tokens (specified by their token ID in the GPT tokenizer) to an associated bias value from -100 to 100. You can use this tokenizer tool (which works for both GPT-2 and GPT-3) to convert text to token IDs. Mathematically, the bias is added to the logits generated by the model prior to sampling. The exact effect will vary per model, but values between -1 and 1 should decrease or increase likelihood of selection; values like -100 or 100 should result in a ban or exclusive selection of the relevant token.
     * As an example, you can pass {"50256": -100} to prevent the <|endoftext|> token from being generated.
     * @var array|null
     */
    private ?array $logitBias = null;

    /**
     * A unique identifier representing your end-user, which can help OpenAI to monitor and detect abuse. Learn more.
     * @var string|null
     */
    private ?string $user = null;

    public function __construct(string $model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        if(empty($this->model)){
            throw new InvalidArgumentException('model parameter is required');
        }
        return $this->model;
    }

    /**
     * @return string|null
     */
    public function getPrompt(): ?string
    {
        return $this->prompt;
    }

    /**
     * @param string|null $prompt
     */
    public function setPrompt(?string $prompt): void
    {
        $this->prompt = $prompt;
    }

    /**
     * @return string|null
     */
    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    /**
     * @param string|null $suffix
     */
    public function setSuffix(?string $suffix): void
    {
        $this->suffix = $suffix;
    }

    /**
     * @return int|null
     */
    public function getMaxTokens(): ?int
    {
        return $this->maxTokens;
    }

    /**
     * @param int|null $maxTokens
     */
    public function setMaxTokens(?int $maxTokens): void
    {
        $this->maxTokens = $maxTokens;
    }

    /**
     * @return int|null
     */
    public function getTemperature(): ?int
    {
        return $this->temperature;
    }

    /**
     * @param int|null $temperature
     */
    public function setTemperature(?int $temperature): void
    {
        $this->temperature = $temperature;
    }

    /**
     * @return int|null
     */
    public function getTopP(): ?int
    {
        return $this->topP;
    }

    /**
     * @param int|null $topP
     */
    public function setTopP(?int $topP): void
    {
        $this->topP = $topP;
    }

    /**
     * @return int|null
     */
    public function getN(): ?int
    {
        return $this->n;
    }

    /**
     * @param int|null $n
     */
    public function setN(?int $n): void
    {
        $this->n = $n;
    }

    /**
     * @return bool|null
     */
    public function getStream(): ?bool
    {
        return $this->stream;
    }

    /**
     * @param bool|null $stream
     */
    public function setStream(?bool $stream): void
    {
        $this->stream = $stream;
    }

    /**
     * @return string|null
     */
    public function getLogprobs(): ?string
    {
        return $this->logprobs;
    }

    /**
     * @param string|null $logprobs
     */
    public function setLogprobs(?string $logprobs): void
    {
        $this->logprobs = $logprobs;
    }

    /**
     * @return bool|null
     */
    public function getEcho(): ?bool
    {
        return $this->echo;
    }

    /**
     * @param bool|null $echo
     */
    public function setEcho(?bool $echo): void
    {
        $this->echo = $echo;
    }

    /**
     * @return string|null
     */
    public function getStop(): ?string
    {
        return $this->stop;
    }

    /**
     * @param string|null $stop
     */
    public function setStop(?string $stop): void
    {
        $this->stop = $stop;
    }

    /**
     * @return float|null
     */
    public function getPresencePenalty(): ?float
    {
        return $this->presencePenalty;
    }

    /**
     * @param float|null $presencePenalty
     */
    public function setPresencePenalty(?float $presencePenalty): void
    {
        $this->presencePenalty = $presencePenalty;
    }

    /**
     * @return float|null
     */
    public function getFrequencyPenalty(): ?float
    {
        return $this->frequencyPenalty;
    }

    /**
     * @param float|null $frequencyPenalty
     */
    public function setFrequencyPenalty(?float $frequencyPenalty): void
    {
        $this->frequencyPenalty = $frequencyPenalty;
    }

    /**
     * @return int|null
     */
    public function getBestOf(): ?int
    {
        return $this->bestOf;
    }

    /**
     * @param int|null $bestOf
     */
    public function setBestOf(?int $bestOf): void
    {
        $this->bestOf = $bestOf;
    }

    /**
     * @return array|null
     */
    public function getLogitBias(): ?array
    {
        return $this->logitBias;
    }

    /**
     * @param array|null $logitBias
     */
    public function setLogitBias(?array $logitBias): void
    {
        $this->logitBias = $logitBias;
    }

    /**
     * @return string|null
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @param string|null $user
     */
    public function setUser(?string $user): void
    {
        $this->user = $user;
    }


}