from openai import OpenAI

query = "Write a single line of poetry."

client = OpenAI(
    base_url = "https://api.endpoints.anyscale.com/v1",
    api_key = ""
)
# Note: not all arguments are currently supported and will be ignored by the backend.
chat_completion = client.chat.completions.create(
    model="mistralai/Mistral-7B-Instruct-v0.1",
    messages=[{"role": "system", "content": "You are a helpful assistant."}, 
              {"role": "user", "content": query}],
    temperature=0.1,
    stream=True
)
for message in chat_completion:
    print(message.choices[0].delta.content, end="", flush=True)