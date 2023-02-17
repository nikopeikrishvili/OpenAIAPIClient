<?php

declare(strict_types=1);

namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Requests;

class EditsRequest
{
    /**
     * ID of the model to use. You can use the text-davinci-edit-001 or code-davinci-edit-001 model with this endpoint.
     * @var string
     */
    private string $model;

    /**
     * The input text to use as a starting point for the edit.
     * @var string|null
     */
    private ?string $input = null;

    /**
     * The instruction that tells the model how to edit the prompt.
     * @var string
     */
    private string $instruction;

    /**
     * How many edits to generate for the input and instruction.
     * @var int|null
     */
    private ?int $n = null;

    /**
     * What sampling temperature to use, between 0 and 2. Higher values like 0.8 will make the output more random,
     * while lower values like 0.2 will make it more focused and deterministic.
     * We generally recommend altering this or top_p but not both.
     * @var int|null
     */
    private ?int $temperature = null;

    /**
     * An alternative to sampling with temperature, called nucleus sampling,
     * where the model considers the results of the tokens with top_p probability mass.
     * So 0.1 means only the tokens comprising the top 10% probability mass are considered.
     * We generally recommend altering this or temperature but not both.
     * @var int|null
     */
    private ?int $topP = null;

    public function __construct(string $model, string $instruction, ?string $input = null)
    {
        $this->model = $model;
        $this->instruction = $instruction;
        $this->input = $input;
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
    public function getInput(): ?string
    {
        return $this->input;
    }

    /**
     * @return string
     */
    public function getInstruction(): string
    {
        if(empty($this->instruction)){
            throw new InvalidArgumentException('instruction parameter is required');
        }
        return $this->instruction;
    }

    /**
     * @return int|null
     */
    public function getN(): ?int
    {
        return $this->n;
    }

    /**
     * @return int|null
     */
    public function getTemperature(): ?int
    {
        return $this->temperature;
    }

    /**
     * @return int|null
     */
    public function getTopP(): ?int
    {
        return $this->topP;
    }

    /**
     * @param int|null $n
     */
    public function setN(?int $n): void
    {
        $this->n = $n;
    }

    /**
     * @param int|null $temperature
     */
    public function setTemperature(?int $temperature): void
    {
        $this->temperature = $temperature;
    }

    /**
     * @param int|null $topP
     */
    public function setTopP(?int $topP): void
    {
        $this->topP = $topP;
    }


}